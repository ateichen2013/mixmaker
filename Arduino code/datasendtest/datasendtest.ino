#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ArduinoJson.h>

//needed for WiFiManager library
#include <DNSServer.h>
#include <WiFiManager.h>

ESP8266WebServer server(70);

void setup()
{
  Serial.begin(115200);
  setup_wifi();

  server.on("/",[](){server.send(200,"text/plain","Hello World!");});
  server.on("/makedrink",receiverequest);
  server.begin();
  GetExternalIP();
}

void loop()
{
  server.handleClient();
}

void receiverequest()
{
  server.sendHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  if (server.arg("drink1") != 0)
  {
    String drink1 = server.arg("drink1");
    Serial.print("drink1: ");
    Serial.println(drink1);
    String drink2 = server.arg("drink2");
    Serial.print("drink2: ");
    Serial.println(drink2);
    String drink3 = server.arg("drink3");
    Serial.print("drink3: ");
    Serial.println(drink3);
    String drink4 = server.arg("drink4");
    Serial.print("drink4: ");
    Serial.println(drink4);
    Serial.println();
    server.send(200,"text/plain","success!");
  }
  else
  {
    server.send(200,"text/plain","rejected");
  }
}

void setup_wifi() {
  WiFi.hostname("MixMaker");
  
  //WiFiManager
  //Local intialization. Once its business is done, there is no need to keep it around
  WiFiManager wifiManager;
  //reset settings - for testing
  //wifiManager.resetSettings();

  //sets timeout until configuration portal gets turned off
  //useful to make it all retry or go to sleep
  //in seconds
  wifiManager.setTimeout(180);
  
  //fetches ssid and pass and tries to connect
  //if it does not connect it starts an access point with the specified name
  //and goes into a blocking loop awaiting configuration
  if(!wifiManager.autoConnect("MixMakerSetup")) {
    Serial.println("failed to connect and hit timeout");
    delay(3000);
    //reset and try again, or maybe put it to deep sleep
    ESP.reset();
    delay(5000);
  } 

  //if you get here you have connected to the WiFi
  Serial.println("connected...yeey :)");
  
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void GetExternalIP()
{
  WiFiClient client;
  if (!client.connect("api.ipify.org", 80)) {
    Serial.println("Failed to connect with 'api.ipify.org' !");
  }
  else {
    int timeout = millis() + 5000;
    client.print("GET /?format=json HTTP/1.1\r\nHost: api.ipify.org\r\n\r\n");
    while (client.available() == 0) {
      if (timeout - millis() < 0) {
        Serial.println(">>> Client Timeout !");
        client.stop();
        return;
      }
    }
    int size;
    while ((size = client.available()) > 0) {
      uint8_t* msg = (uint8_t*)malloc(size);
      size = client.read(msg, size);
      Serial.write(msg, size);
      Serial.println();
      Serial.println();
      free(msg);
    }
  }
}

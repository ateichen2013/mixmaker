#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ArduinoJson.h>

//needed for WiFiManager library
#include <DNSServer.h>
#include <WiFiManager.h>

ESP8266WebServer server;

void setup()
{
  Serial.begin(115200);
  setup_wifi();

  server.on("/",[](){server.send(200,"text/plain","Hello World!");});
  server.on("/makedrink",receiverequest);
  server.begin();
}

void loop()
{
  server.handleClient();
}

void receiverequest()
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
  server.sendHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  server.send(204,"");
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

#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <ArduinoJson.h>

//needed for WiFiManager library
#include <DNSServer.h>
#include <WiFiManager.h>

ESP8266WebServer server(80);

//Pump pins
const int pump1 = D0;
const int pump2 = D1;
const int pump3 = D2;
const int pump4 = D3;
const int pump5 = D4;

//Sensor pins
const int sensor1 = D6;
const int sensor2 = D7;

const int scuptime = 10000;
const int lcuptime = 20000;
int cuptime = 10000;
const int primetime = 1000;

int pump1percent = 0;
int pump2percent = 0;
int pump3percent = 0;
int pump4percent = 0;

int pump1time = 0;
int pump2time = 0;
int pump3time = 0;
int pump4time = 0;

bool pump1on = false;
bool pump2on = false;
bool pump3on = false;
bool pump4on = false;

unsigned long ontime = 0;

void setup() {
  //Set pump pins to output
  pinMode(pump1, OUTPUT);
  pinMode(pump2, OUTPUT);
  pinMode(pump3, OUTPUT);
  pinMode(pump4, OUTPUT);
  pinMode(pump5, OUTPUT);

  //Set sensor pins to input
  pinMode(sensor1, INPUT);
  pinMode(sensor2, INPUT);

  //Begin serial
  Serial.begin(115200);
  setup_wifi();

  GetExternalIP();

  server.on("/",[](){server.send(200,"text/plain","Hello World!");});
  server.on("/makedrink",receiverequest);
  server.begin();
}

void loop() {
  server.handleClient();
}

void receiverequest()
{
  server.sendHeader("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  if (server.arg("drink1") != 0)
  {
    pump1percent = server.arg("drink1").toInt();
    Serial.print("pump1percent: ");
    Serial.println(pump1percent);
    pump2percent = server.arg("drink2").toInt();
    Serial.print("pump2percent: ");
    Serial.println(pump2percent);
    pump3percent = server.arg("drink3").toInt();
    Serial.print("pump3percent: ");
    Serial.println(pump3percent);
    pump4percent = server.arg("drink4").toInt();
    Serial.print("pump4percent: ");
    Serial.println(pump4percent);
    Serial.println();
    if(pumpdrinks() == 1)
    {
      server.send(200,"text/plain","success!");
    }
    else
    {
      server.send(200,"text/plain","failure!");
    }
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

int pumpdrinks()
{
  if(digitalRead(sensor1) == LOW)
  {
    Serial.println("Cup deteced");
    if(digitalRead(sensor2) == LOW)
    {
      Serial.println("Large cup deteced");
      cuptime = lcuptime;
    }
    else
    {
      Serial.println("Small cup deteced");
      cuptime = scuptime;
    }
    if (pump1percent > 0)
    {
      digitalWrite(pump1, HIGH);
      pump1on = true;
      pump1time = (pump1percent * 0.01 * cuptime) + primetime;
    }
    if (pump2percent > 0)
    {
      digitalWrite(pump2, HIGH);
      pump2on = true;
      pump2time = pump2percent * 0.01 * cuptime + primetime;
    }
    if (pump3percent > 0)
    {
      digitalWrite(pump3, HIGH);
      pump3on = true;
      pump3time = pump3percent * 0.01 * cuptime + primetime;
    }
    if (pump4percent > 0)
    {
      digitalWrite(pump4, HIGH);
      pump4on = true;
      pump4time = pump4percent * 0.01 * cuptime + primetime;
    }
    ontime = millis();
    while(pump1on || pump2on || pump3on || pump4on)
    {
      if (millis() >= ontime + pump1time && pump1on)
      {
        digitalWrite(pump1, LOW);
        pump1on = false;
        pump1time = 0;
        Serial.println("pump1 off");
      }
      if (millis() >= ontime + pump2time && pump2on)
      {
        digitalWrite(pump2, LOW);
        pump2on = false;
        pump2time = 0;
        Serial.println("pump2 off");
      }
      if (millis() >= ontime + pump3time && pump3on)
      {
        digitalWrite(pump3, LOW);
        pump3on = false;
        pump3time = 0;
        Serial.println("pump3 off");
      }
      if (millis() >= ontime + pump4time && pump4on)
      {
        digitalWrite(pump4, LOW);
        pump4on = false;
        pump4time = 0;
        Serial.println("pump4 off");
      }
      yield();
    }
    Serial.println();
    digitalWrite(pump5, HIGH);
    delay(1000);
    digitalWrite(pump5, LOW);
    return 1;
  }
  else
  {
    Serial.println("No cup deteced");
    Serial.println();
    return 0;
  }
}


//Pump pins
const int pump1 = D0;
const int pump2 = D1;
const int pump3 = D2;
const int pump4 = D3;
const int pump5 = D4;

const int cuptime = 10000;
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

  //Begin serial
  Serial.begin(115200);
}

void loop() {
  Serial.println();
  Serial.println("Please enter drink percentages");
  Serial.print("Drink 1: ");
  while (!Serial.available());
  pump1percent = Serial.parseInt();
  Serial.println(pump1percent);
  Serial.print("Drink 2: ");
  while (!Serial.available());
  pump2percent = Serial.parseInt();
  Serial.println(pump2percent);
  Serial.print("Drink 3: ");
  while (!Serial.available());
  pump3percent = Serial.parseInt();
  Serial.println(pump3percent);
  Serial.print("Drink 4: ");
  while (!Serial.available());
  pump4percent = Serial.parseInt();
  Serial.println(pump4percent);

  digitalWrite(pump1, HIGH);
  pump1on = true;
  digitalWrite(pump2, HIGH);
  pump2on = true;
  digitalWrite(pump3, HIGH);
  pump3on = true;
  digitalWrite(pump4, HIGH);
  pump4on = true;
  Serial.println("Pumps on");
  if (pump1percent > 0)
  {
    pump1time = (pump1percent * 0.01 * cuptime) + primetime;
  }
  if (pump2percent > 0)
  {
    pump2time = pump2percent * 0.01 * cuptime + primetime;
  }
  if (pump3percent > 0)
  {
    pump3time = pump3percent * 0.01 * cuptime + primetime;
  }
  if (pump4percent > 0)
  {
    pump4time = pump4percent * 0.01 * cuptime + primetime;
  }
  ontime = millis();
  while(pump1on || pump2on || pump3on || pump4on)
  {
    if (millis() >= ontime + pump1time && pump1on)
    {
      digitalWrite(pump1, LOW);
      pump1on = false;
      Serial.println("pump1 off");
    }
    if (millis() >= ontime + pump2time && pump2on)
    {
      digitalWrite(pump2, LOW);
      pump2on = false;
      Serial.println("pump2 off");
    }
    if (millis() >= ontime + pump3time && pump3on)
    {
      digitalWrite(pump3, LOW);
      pump3on = false;
      Serial.println("pump3 off");
    }
    if (millis() >= ontime + pump4time && pump4on)
    {
      digitalWrite(pump4, LOW);
      pump4on = false;
      Serial.println("pump4 off");
    }
    yield();
  }
  digitalWrite(pump5, HIGH);
  delay(500);
  digitalWrite(pump5, LOW);
}

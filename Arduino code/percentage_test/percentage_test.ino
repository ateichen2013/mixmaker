//Pump pins
const int pump1 = D0;
const int pump2 = D1;
const int pump3 = D2;
const int pump4 = D3;
const int pump5 = D4;

const int cuptime = 10000;

int pump1percent = 0;
int pump2percent = 0;
int pump3percent = 0;
int pump4percent = 0;

int pump1time = 0;
int pump2time = 0;
int pump3time = 0;
int pump4time = 0;

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
  digitalWrite(pump2, HIGH);
  digitalWrite(pump3, HIGH);
  digitalWrite(pump4, HIGH);
  Serial.println("Pumps on");
  pump1time = pump1percent * cuptime;
  pump2time = pump2percent * cuptime;
  pump3time = pump3percent * cuptime;
  pump4time = pump4percent * cuptime;
  ontime = millis();
  while(true)
  {
    if (millis() >= ontime + pump1time)
    {
      digitalWrite(pump1, LOW);
      Serial.println("pump1 off");
    }
    if (millis() >= ontime + pump2time)
    {
      digitalWrite(pump2, LOW);
      Serial.println("pump2 off");
    }
    if (millis() >= ontime + pump3time)
    {
      digitalWrite(pump3, LOW);
      Serial.println("pump3 off");
    }
    if (millis() >= ontime + pump4time)
    {
      digitalWrite(pump4, LOW);
      Serial.println("pump4 off");
    }
  }
}

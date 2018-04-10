# locatorv2


Business Requirements 
1. The API will receive a latitude/longitude, using the provided list in pharmacies.csv the API will calculate the closest pharmacy to the input latitude/longitude. 

2. The API will return the closest pharmacy (with name and address) in a consumable response packet. 

3. **The API will include the distance (in miles) _between_ the input latitude/longitude and the selected closest pharmacy in the response packet.**


Example: output from API
 ````
 {
         "response": "success",
         "location": [
             {
                 "pharmacy_name": "ASSURED PHARMACY",
                 "address": "11100 ASH ST STE 200",
                 "city": "LEAWOOD",
                 "state": "KS",
                 "postal_code": "66211"
             }
         ],
         "Distance": 6.7,
         "User Latitude": "38.9625347",
         "User Longitude": "-94.763679"
     }
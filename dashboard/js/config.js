var hide_empty_list=true;

addListGroup("vehicles", "car-makers");

addList("car-makers", "Select a maker", "", "dummy-maker");
addList("car-makers", "Toyota", "Toyota", "Toyota");
addList("car-makers", "Honda", "Honda", "Honda");
addList("car-makers", "Chrysler", "Chrysler", "Chrysler", 1);
addList("car-makers", "Dodge", "Dodge", "Dodge");
addList("car-makers", "Ford", "Ford", "Ford");

addList("dummy-maker", "Not available", "", "dummy-car");

addOption("dummy-car", "Not available", "");

addList("Toyota", "Select vehicle type", "", "dummy-toyota");
addList("Toyota", "Cars", "car", "Toyota-Cars");
addList("Toyota", "SUVs/Van", "suv", "Toyota-SUVs/Van");
addList("Toyota", "Trucks", "truck", "Toyota-Trucks", 1);

addOption("dummy-toyota", "Not available", "");

addOption("Toyota-Cars", "Select a model", "");
addOption("Toyota-Cars", "Avalon", "Avalon");
addOption("Toyota-Cars", "Camry", "Camry");
addOption("Toyota-Cars", "Celica", "Celica");
addOption("Toyota-Cars", "Corolla", "Corolla");
addOption("Toyota-Cars", "ECHO", "ECHO");
addOption("Toyota-Cars", "Matrix", "Matrix");
addOption("Toyota-Cars", "MR2 Spyder", "MR2 Spyder");
addOption("Toyota-Cars", "Prius", "Prius");

addOption("Toyota-SUVs/Van", "Select a model", "");
addOption("Toyota-SUVs/Van", "4Runner", "4Runner");
addOption("Toyota-SUVs/Van", "Highlander", "Highlander");
addOption("Toyota-SUVs/Van", "Land Cruiser", "Land Cruiser");
addOption("Toyota-SUVs/Van", "RAV4", "RAV4");
addOption("Toyota-SUVs/Van", "Sequoia", "Sequoia");
addOption("Toyota-SUVs/Van", "Sienna", "Sienna", 1);

addOption("Toyota-Trucks", "Select a model", "");
addOption("Toyota-Trucks", "Tacoma", "Tacoma");
addOption("Toyota-Trucks", "Tundra", "Tundra", 1);

addList("Honda", "Select vehicle type", "", "dummy-honda");
addList("Honda", "Cars", "car", "Honda-Cars");
addList("Honda", "SUVs/Van", "suv", "Honda-SUVs/Van", 1);

addOption("dummy-honda", "Not available", "");

addOption("Honda-Cars", "Select a model", "");
addOption("Honda-Cars", "Accord Sedan", "Accord Sedan");
addOption("Honda-Cars", "Accord Coupe", "Accord Coupe");
addOption("Honda-Cars", "Civic Sedan", "Civic Sedan");
addOption("Honda-Cars", "Civic Coupe", "Civic Coupe");
addOption("Honda-Cars", "Civic Hybrid", "Civic Hybrid");
addOption("Honda-Cars", "Civic Si", "Civic Si");
addOption("Honda-Cars", "Civic GX", "Civic GX");
addOption("Honda-Cars", "Insight", "Insight");
addOption("Honda-Cars", "S2000", "S2000");

addOption("Honda-SUVs/Van", "Select a model", "");
addOption("Honda-SUVs/Van", "CR-V", "CR-V");
addOption("Honda-SUVs/Van", "Pilot", "Pilot");
addOption("Honda-SUVs/Van", "Odyssey", "Odyssey", 1);

addList("Chrysler", "Select vehicle type", "", "dummy-chrysler");
addList("Chrysler", "Cars", "car", "Chrysler-Cars", 1);
addList("Chrysler", "SUVs/Van", "suv", "Chrysler-SUVs/Van");

addOption("dummy-chrysler", "Not available", "");

addOption("Chrysler-Cars", "Select a model", "");
addOption("Chrysler-Cars", "300M", "300M");
addOption("Chrysler-Cars", "PT Cruiser", "PT Cruiser", 1);
addOption("Chrysler-Cars", "Concorde", "Concorde");
addOption("Chrysler-Cars", "Sebring Coupe", "Sebring Coupe");
addOption("Chrysler-Cars", "Sebring Sedan", "Sebring Sedan");
addOption("Chrysler-Cars", "Sebring Convertible", "Sebring Convertible");

addOption("Chrysler-SUVs/Van", "Select a model", "");
addOption("Chrysler-SUVs/Van", "Town & Country", "Town & Country");
addOption("Chrysler-SUVs/Van", "Voyager", "Voyager");

addList("Dodge", "Select vehicle type", "", "dummy-dodge");
addList("Dodge", "Cars", "car", "Dodge-Cars");
addList("Dodge", "SUVs/Van", "suv", "Dodge-SUVs/Van");
addList("Dodge", "Trucks", "truck", "Dodge-Trucks");

addOption("dummy-dodge", "Not available", "");

addOption("Dodge-Cars", "Select a model", "");
addOption("Dodge-Cars", "Intrepid", "Intrepid");
addOption("Dodge-Cars", "Neon", "Neon");
addOption("Dodge-Cars", "SRT-4", "SRT-4");
addOption("Dodge-Cars", "Stratus Coupe", "Stratus Coupe");
addOption("Dodge-Cars", "Stratus Sedan", "Stratus Sedan");
addOption("Dodge-Cars", "Viper", "Viper");

addOption("Dodge-SUVs/Van", "Select a model", "");
addOption("Dodge-SUVs/Van", "Caravan", "Caravan");
addOption("Dodge-SUVs/Van", "Durango", "Durango");
addOption("Dodge-SUVs/Van", "Ram Van", "Ram Van");

addOption("Dodge-Trucks", "Select a model", "");
addOption("Dodge-Trucks", "Dakota", "Dakota");
addOption("Dodge-Trucks", "Ram Pickup", "Ram Pickup");

addList("Ford", "Select vehicle type", "", "dummy-ford");
addList("Ford", "Cars", "car", "Ford-Cars");
addList("Ford", "SUVs/Van", "suv", "Ford-SUVs/Van");
addList("Ford", "Trucks", "truck", "Ford-Trucks");

addOption("dummy-ford", "Not available", "");

addOption("Ford-Cars", "Select a model", "");
addOption("Ford-Cars", "ZX2", "ZX2");
addOption("Ford-Cars", "Focus", "Focus");
addOption("Ford-Cars", "Taurus", "Taurus");
addOption("Ford-Cars", "Crown Victoria", "Crown Victoria");
addOption("Ford-Cars", "Mustang", "Mustang");
addOption("Ford-Cars", "Thunderbird", "Thunderbird");

addOption("Ford-SUVs/Van", "Select a model", "");
addOption("Ford-SUVs/Van", "Escape", "Escape");
addOption("Ford-SUVs/Van", "Explorer", "Explorer");
addOption("Ford-SUVs/Van", "Expedition", "Expedition");
addOption("Ford-SUVs/Van", "Excursion", "Excursion");
addOption("Ford-SUVs/Van", "Windstar", "Windstar");
addOption("Ford-SUVs/Van", "Econoline", "Econoline");

addOption("Ford-Trucks", "Select a model", "");
addOption("Ford-Trucks", "Ranger", "Ranger");
addOption("Ford-Trucks", "F-150", "F-150");
addOption("Ford-Trucks", "F-250", "F-250");
addOption("Ford-Trucks", "F-350", "F-350");

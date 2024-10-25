class Bus:
    def __init__(self, bus_id, destination, seats):
        self.bus_id = bus_id
        self.destination = destination
        self.seats = seats

    def __str__(self):
        return f"Bus ID: {self.bus_id}, Destination: {self.destination}, Seats Available: {self.seats}"


class BusManagementSystem:
    def __init__(self):
        self.buses = []

    def add_bus(self, bus_id, destination, seats):
        new_bus = Bus(bus_id, destination, seats)
        self.buses.append(new_bus)
        print(f"Bus {bus_id} added successfully.")

    def display_buses(self):
        if not self.buses:
            print("No buses available.")
            return
        for bus in self.buses:
            print(bus)

    def find_bus(self, bus_id):
        for bus in self.buses:
            if bus.bus_id == bus_id:
                return bus
        return None


def main():
    system = BusManagementSystem()
    while True:
        print("\nBus Management System")
        print("1. Add Bus")
        print("2. Display Buses")
        print("3. Find Bus by ID")
        print("4. Exit")

        choice = input("Enter your choice: ")

        if choice == '1':
            bus_id = input("Enter Bus ID: ")
            destination = input("Enter Destination: ")
            seats = int(input("Enter Number of Seats: "))
            system.add_bus(bus_id, destination, seats)

        elif choice == '2':
            system.display_buses()

        elif choice == '3':
            bus_id = input("Enter Bus ID to find: ")
            bus = system.find_bus(bus_id)
            if bus:
                print(bus)
            else:
                print("Bus not found.")

        elif choice == '4':
            print("Exiting the system.")
            break

        else: 
            print("Invalid choice. Please try again.")


if __name__ == "__main__":
    main()

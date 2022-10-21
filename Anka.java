import java.io.*;

public class Anka {
    public static void main(String[] args) throws IOException {
        String participant_details = "";
        String product_details = "";
        String request ;
        String command;
        String Product;
        String currentProduct = "";
        System.out.println("Welcome to ANKA BUSINESS SUPPORT SERVICES SYSTEM");
        System.out.println("Menu");
        System.out.println("Register name password product date of birth");
        System.out.println("Post_product product_name description including quantity and rate per item");
        System.out.println("Performance");
        System.out.println("Type exit when you want to exit");
        System.out.println();
        do {
            BufferedReader b = new BufferedReader(new InputStreamReader(System.in));
            //captures all the details entered by the participant
            System.out.println("Enter a command");
            command = b.readLine();
            //reads every line of command entered by the user.
            if (command.equalsIgnoreCase("Register")) {
                System.out.print("Register: ");
                participant_details = b.readLine();
                //reads all the participant details entered
            } else if (command.equalsIgnoreCase("Post product")) {
                System.out.println("Enter product");
                Product = b.readLine();

                if (currentProduct.equals(Product)){
                    System.out.println("Product already registered");
                }
                else {
                    System.out.println("Proceed");

                    System.out.println("Post_product: ");
                    product_details = b.readLine();
                }
            }
            //reads all the product details entered by the participant
            try {
                PrintWriter writer = new PrintWriter(new FileWriter("Details.txt", true), true);
                writer.print(participant_details);
                writer.println();
                writer.print(product_details);
                writer.println();
                writer.close();
            } catch (IOException e) {
                System.out.println("Error occurred please re-enter your details");
            }
            if (command.equalsIgnoreCase("Request")) {
                int participantId;
                System.out.println("Enter the participant id given");
                 participantId = b.read();
                request = b.readLine();
                System.out.println("Enter your request");
                try {
                    PrintWriter w = new PrintWriter(new FileWriter("Request.txt", true), true);
                    w.print(request);
                    w.println();
                    w.print(participantId);
                    w.println();
                    w.close();
                } catch (IOException e) {
                    System.out.println("No request found");
                }
            } else if (command.equalsIgnoreCase("Performance")) {
                    String fileName = "Performance.txt";
                    FileReader reader = new FileReader(fileName);
                    try {
                        int x;
                        while ((x = reader.read()) != -1) {
                            System.out.print((char) x);
                        }
                        reader.close();
                    } catch (FileNotFoundException e) {
                        System.out.println("File not found");
                    } catch (IOException e) {
                        System.out.println("No content found");
                    }
                }
        }
           while (!command.equalsIgnoreCase("Exit")) ;
    }
}



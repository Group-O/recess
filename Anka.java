import java.io.*;

public class Anka {
    public static void main(String[] args) throws IOException {
        String participant_details = "";
        String product_details = "";
        String request ;
        String command;
        System.out.println("Welcome to ANKA BUSINESS SUPPORT SERVICES SYSTEM");
        System.out.println("Menu");
        System.out.println("Register name ; password ; product");
        System.out.println("Post_product product_name ; description ; quantity ; rate per item");
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


            

                    System.out.print("Post_product: ");
                    product_details = b.readLine();
                }
            
            //reads all the product details entered by the participant
            try {
                PrintWriter writer = new PrintWriter(new FileWriter("Details.txt", true), true);
                writer.println(participant_details);
                // writer.println();
                writer.close();
            } catch (IOException e) {
                System.out.println("Error occurred please re-enter your details");
            } 
            try{
                PrintWriter writer = new PrintWriter( new FileWriter("Products.txt",true),true);
            writer.println(product_details);
            // writer.println();
            writer.close();}
            catch(IOException e){
                System.out.println("error");
            }


            if (command.equalsIgnoreCase("Request")) {
             //   int participantId;
             //   System.out.println("Enter the participant id given");
              //   participantId = b.read();
                request = b.readLine();
                System.out.println("Enter your request");
                try {
                    PrintWriter w = new PrintWriter(new FileWriter("Request.txt", true), true);
                    w.println(request);
                    // w.println();
                    // w.print(participantId);
                    // w.println();
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
                System.out.println();
        }
           while (!command.equalsIgnoreCase("Exit")) ;
    }
}



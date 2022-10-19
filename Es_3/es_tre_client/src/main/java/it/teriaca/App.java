package it.teriaca;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

public class App {
    private static  String fine = "fine";

    public static void main(String[] args) throws Exception {
        Socket s = new Socket("localhost", 3000);

        PrintWriter pr = new PrintWriter(s.getOutputStream(), true);

        BufferedReader br = new BufferedReader(new InputStreamReader(s.getInputStream()));

        BufferedReader tastiera = new BufferedReader(new InputStreamReader(System.in));

        pr.println("Eccomi");
        System.out.println(br.readLine());
        pr.println(tastiera.readLine());
        System.out.println(br.readLine());

        for(; ;){
            String x = tastiera.readLine();
            pr.println(x);
            if(x.equals(fine)){
                break;
            }
            
            System.out.println(br.readLine());
        }
    }
}

package it.teriaca;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

public class ClientHandler extends Thread {
    private Socket s;
    private PrintWriter pr = null;
    private BufferedReader br = null;
    static int contatore = 0;
    public ClientHandler(Socket s) {
        this.s = s;
        try {
            pr = new PrintWriter(s.getOutputStream(), true);
            br = new BufferedReader(new InputStreamReader(s.getInputStream()));
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void run() {
 
        contatore++;
        try {
            System.out.println(br.readLine());
            pr.println("Ciao, come ti chiami?");
            String name = br.readLine(); // ricevo: il peso
            System.out.println(name);
            pr.println("Server: " + name + " sei l'utente n. " + contatore );
           
        } catch (IOException e) {
            e.printStackTrace();
        }
        try {
            s.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

}

package it.teriaca;

import java.io.BufferedReader;
import java.io.IOException;
//import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;

/**
 * Hello world!
 *
 */
public class App 
{
    public static void main( String[] args ) throws IOException
    {

        int portaServer = 3000;

        ServerSocket ss = new ServerSocket(portaServer);
        System.out.println("Server in ascolto sulla porta " + portaServer);
        Socket s = ss.accept();
        System.out.println("Client Connesso");

        InputStreamReader in = new InputStreamReader(s.getInputStream());
        BufferedReader br = new BufferedReader(in);
        String str = br.readLine();
        System.out.println("Client: " + str);

        PrintWriter pr = new PrintWriter(s.getOutputStream());
        pr.println("Ben Arrivato");
        pr.flush();
        s.close();
        ss.close();
        
    }
}

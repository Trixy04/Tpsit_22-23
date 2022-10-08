package it.teriaca;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

/**
 * Hello world!
 *
 */
public class App 
{
    public static void main( String[] args )throws Exception
    {
        Socket s= new Socket("localhost",3000);
        PrintWriter pr = new PrintWriter(s.getOutputStream());
        /*pr.println("ci sono");
        pr.flush();*/

        BufferedReader tastiera=new BufferedReader(new InputStreamReader(System.in));
        System.out.println("inserisci il messaggio:");
        String stringUtente = tastiera.readLine();

        pr.println(stringUtente);
        pr.flush();

        /*InputStreamReader in = new InputStreamReader(s.getInputStream());
        BufferedReader br = new BufferedReader(in);*/

        BufferedReader inputStrem1 = new BufferedReader(new InputStreamReader(s.getInputStream())); 

        String str1 = inputStrem1.readLine();
        System.out.println("Server: "+str1);

        BufferedReader inputStrem = new BufferedReader(new InputStreamReader(s.getInputStream())); 

        String str = inputStrem.readLine();
        System.out.println("Server: "+str);
   
        s.close();
    }
}

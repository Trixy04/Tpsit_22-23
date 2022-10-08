/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Project/Maven2/JavaApp/src/main/java/${packagePath}/${mainClassName}.java to edit this template
 */

package it.teriaca.es_uno_server;

import java.io.BufferedReader;
import java.io.IOException;
//import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
/**
 *
 * @author teria
 */
public class Es_uno_server {

    public static void main( String[] args ) throws IOException
    {

        int portaServer = 3000;
        

        ServerSocket ss = new ServerSocket(portaServer);
        System.out.println("Server in ascolto sulla porta " + portaServer);
        Socket s = ss.accept();
        System.out.println("Client Connesso");

        InputStreamReader altezza = new InputStreamReader(s.getInputStream());
        BufferedReader br = new BufferedReader(altezza);
        String HG = br.readLine();
        System.out.println("Client --> " + "Altezza: " + HG + " Cm");

        InputStreamReader peso = new InputStreamReader(s.getInputStream());
        BufferedReader br1 = new BufferedReader(peso);
        String WG = br1.readLine();
        System.out.println("Client --> " + "Peso: " + WG + " Kg");

        PrintWriter pr = new PrintWriter(s.getOutputStream());

        float H = Float.parseFloat(HG);
        float W = Float.parseFloat(WG);
        float mol = H*H;
        float BMI = W / mol;

        pr.println("L'indice metabolico-salutistico e': " + BMI);

        pr.flush();
        s.close();
        ss.close();
        
    }
}



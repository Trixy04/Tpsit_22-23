package it;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.time.ZoneId;
import java.time.ZonedDateTime;
import java.time.format.DateTimeFormatter;
import java.util.Calendar;
import java.util.GregorianCalendar;

public class ClientHandler extends Thread {
    private Socket s;
    private PrintWriter pr = null;
    private BufferedReader br = null;
    
    private int c;
    private String comando;
    private String output;
    static String nomeServer = "Server_Teriaca";

    //contatore = contatore+1;
    public ClientHandler(Socket s,int c) {
        this.s = s;
        this.comando = "";
        this.output = "";
        this.c=c;
        try {
            pr = new PrintWriter(s.getOutputStream(), true);
            br = new BufferedReader(new InputStreamReader(s.getInputStream()));
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void run() {
 
        try {
            //contatore++;
            System.out.println(br.readLine());
            pr.println("Ciao, come ti chiami?");
            String name = br.readLine().toUpperCase(); 
            System.out.println(name);
            pr.println("Server: " + name + " sei l'utente n. " + c );

            for(;;){
                comando = br.readLine();

                if(comando.equals("data")){

                    Calendar cal = new GregorianCalendar();
                    int giorno = cal.get(Calendar.DAY_OF_MONTH);
                    int mese = cal.get(Calendar.MONTH);
                    int anno = cal.get(Calendar.YEAR);
                    output = giorno + "-" + (mese + 1) + "-" + anno;
                    pr.println(output);

                }else if(comando.equals("ora")){

                    String timestamp = ZonedDateTime.now(ZoneId.of("Europe/Berlin"))
                    .format(DateTimeFormatter.ofPattern("hh.mm.ss a"));

                    pr.println("L'ora attuale è: " + timestamp);

                }else if(comando.equals("id")){

                    pr.println("Sei l'utente numero: " + c);

                }else if(comando.equals("nome")){

                    pr.println("Il nome del server è: " + nomeServer);

                }else if(comando.equals("fine")){

                    System.out.println("Connessione chiusa con utente n. " + c);
                    s.close();
                    break;

                }else{

                    pr.println("Il comando inserito non è valido");

                }

            }
           
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

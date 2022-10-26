package it.teriaca;

import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;

import it.ClientHandler;

public class App {
    static int contatore = 0;

  public static void main(String[] args) throws Exception {


    ArrayList<ClientHandler> clients = new ArrayList<>();

    ServerSocket ss = new ServerSocket(3000);
    System.out.println("Server in ascolto sulla porta 3000");
    boolean running = true;
    while (running) {
      Socket s = ss.accept();
      contatore++;
      System.out.println("Client connesso");
      ClientHandler client = new ClientHandler(s, contatore, clients);
      clients.add(client);
      client.start();
    }
    ss.close();
  }
}

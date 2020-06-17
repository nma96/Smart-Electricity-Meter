
package test2;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.URL;
import java.net.URLConnection;


import static java.net.URLEncoder.*;


public class Test2  {

    public static void main(String args[]){
        try{
            String username = "7";

            String link="http://smartmeter.000webhostapp.com/phpFetch.php";
            String data="";

            URL url = new URL(link);
            URLConnection conn = url.openConnection();

            conn.setDoOutput(true);
            OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());

            wr.write(data );
            wr.flush();

            BufferedReader reader = new BufferedReader(new
                    InputStreamReader(conn.getInputStream()));

            StringBuilder sb = new StringBuilder();
            String line = null;

            // Read Server Response
            while((line = reader.readLine()) != null) {
                sb.append(line);
                break;
            }

            System.out.println(sb.toString());
        } catch(Exception e){
                        System.out.println(e.getMessage());
            
        }
    }
}

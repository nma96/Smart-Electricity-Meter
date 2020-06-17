package smartmeter.elexa;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    public Button LoginButton;
    EditText Username;
    EditText Password;

    public void init(){
        LoginButton = (Button)findViewById(R.id.LoginButton);
        Username   = (EditText)findViewById(R.id.userIDTextField);
        Password   = (EditText)findViewById(R.id.PasswordTextField);
        LoginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(Username.getText().toString().equals("10") && Password.getText().toString().equals("10")) {
                    Intent Units = new Intent(MainActivity.this, Units.class);
                    startActivity(Units);
                }else{
                    String message = "Incorrect Username or Password!";
                    Toast.makeText(getApplicationContext(), message, Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        init();
    }
}

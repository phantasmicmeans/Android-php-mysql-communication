package com.example.samsung_pc.makeprojectgo;

import android.app.Activity;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.ActionBarActivity;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;


public class menu extends ActionBarActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    String json_string;
    String id_string;

    EditText txt;
Button btn;
    NavigationView navigationView;
    View headerLayout;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        new JsonTask().execute("http://stylejonline.ddns.net/SearchBoard.php");

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

      navigationView = (NavigationView) findViewById(R.id.nav_view);
        headerLayout=navigationView.inflateHeaderView(R.layout.nav_header_menu);
        navigationView.setNavigationItemSelectedListener(this);
/*
        findViewById(R.id.buttonPants);
        findViewById(R.id.buttonShirts);
        findViewById(R.id.buttonTshirt);
        findViewById(R.id.buttonSuit);
        findViewById(R.id.buttonCap);
        findViewById(R.id.buttonSocks);
        findViewById(R.id.buttonVintage);
        */

        findViewById(R.id.buttonWrite);
        findViewById(R.id.buttonwhole);
        findViewById(R.id.buttonmonth);
        findViewById(R.id.buttonwhole);


        String name="StyleJ";

        Button btn=(Button)headerLayout.findViewById(R.id.buttonlogin);
        EditText et=(EditText)headerLayout.findViewById(R.id.TextLogin);
/*
        Intent intent=getIntent();
        String name=intent.getStringExtra("name");
        String logout=intent.getStringExtra("logout");
*/
/*
        SharedPreferences pref=getSharedPreferences("PREF",0);

        F.setId(pref.getString("IDKey",null));
        et.setText(F.getId());
*/   Reference F=(Reference)getApplication();

        if(F.setLogin()==1){
            id_string=getIntent().getExtras().getString("name");

            F.setName(id_string);

            headerLayout.findViewById(R.id.TextLogin);
            et.setText("'"+id_string+"'"+" 님 환영합니다!");

            headerLayout.findViewById(R.id.buttonlogin);
            btn.setText("로그아웃");
            F.getLogin(2);

        }


   //     Reference F=(Reference)getApplication();

      //  Log.d("F.login",String.valueOf(F.setLogin()));
      //  if(F.setLogin()==1){

       //     txt=(EditText)findViewById(R.id.TextLogin);
       //     txt.setText("로그인 되었습니다");

            //btn=(Button)findViewById(R.id.buttonlogin);
           // btn.setText("로그아웃");

      //  }
     //   else{
      //      Log.d("noText","sdfsdfs");
      //  }





//            Log.d("txt",txt.getText().toString());

          //  String logout="logout";
          //  btn.setText(logout);



     ///   TextView name=(TextView)findViewById(R.id.textname);
      //  TextView id=(TextView)findViewById(R.id.textid);





       /* FloatingActionButton fab = (FloatingActionButton) findViewById(R.id.fab);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Snackbar.make(view, "Replace with your own action", Snackbar.LENGTH_LONG)
                        .setAction("Action", null).show();
            }
        });

*/
    }
public void LoginSignClick(View v){
    Button btn=(Button)headerLayout.findViewById(R.id.buttonlogin);
    EditText te=(EditText)headerLayout.findViewById(R.id.TextLogin);
    Reference F=(Reference)getApplication();
        switch(v.getId()) {
            case R.id.buttonlogin:
                if(F.setLogin()==2){
                F.getLogin(0);  //로그인
                    F.getNum(0); //쿠폰
                btn.setText("로그인");
                te.setText("로그인이 필요합니다.");
                Toast.makeText(getApplicationContext(),"로그아웃 되었습니다",Toast.LENGTH_SHORT).show();
                }else{
                    startActivity(new Intent(this,LoginActivity.class));
                break;
        }
    }


    }


public void ConvertClick(View v){
    Reference F=(Reference)getApplication();
    switch(v.getId()){
        /*
        case R.id.buttonTshirt:
            startActivity(new Intent(this,TShirstActivity.class));
            break;
        case R.id.buttonPants:
            startActivity(new Intent(this,PantsActivity.class));
            break;
        case R.id.buttonShirts:
            startActivity(new Intent(this,ShirtsActivity.class));
            break;
        case R.id.buttonSuit:
            startActivity(new Intent(this,StreetActivity.class));
            break;
        case R.id.buttonSocks:
            startActivity(new Intent(this,OuterActivity.class));
            break;
        case R.id.buttonShoes:
            startActivity(new Intent(this,ShoesActivity.class));
            break;
        case R.id.buttonCap:
            startActivity(new Intent(this,CapActivity.class));
            break;
        case R.id.buttonVintage:
            startActivity(new Intent(this,VintageActivity.class));
            break;
            */
        case R.id.buttonWrite:
            startActivity(new Intent(this,WriteBoardActivity.class));
            break;

      /*  case R.id.buttonlogin:

            startActivity(new Intent(this,LoginActivity.class));
            break;
            */
        case R.id.buttonsign:
            startActivity(new Intent(this,SignActivity.class));
            break;
        case R.id.buttonwhole:
            if(json_string==null){
                Toast.makeText(getApplicationContext(),"다시 클릭해 주세요",Toast.LENGTH_SHORT).show();
            }
            else
            {
                Intent intent=new Intent(this,FullShopsActivity.class);
                intent.putExtra("json_data",json_string);
                startActivity(intent);
            }

            break;
        case R.id.Whole:

                break;
        case R.id.Board:

            if(F.login==2) {
                if (json_string == null) {
                    Toast.makeText(getApplicationContext(), "데이터를 읽어오는데 실패했습니다.", Toast.LENGTH_SHORT).show();
                } else {
                    Intent intent = new Intent(this, BoardActivity.class);
                    intent.putExtra("json_data", json_string);
                    startActivity(intent);

                }
            }
            else{
                Toast.makeText(getApplicationContext(),"로그인을 해주세요",Toast.LENGTH_SHORT).show();

            }
            break;
        case R.id.Review:
            startActivity(new Intent(this,WriteBoardActivity.class));
            break;
        case R.id.Coupon:
            Toast.makeText(getApplicationContext(),"쿠폰 발급 기간이 아닙니다",Toast.LENGTH_SHORT).show();
            break;
        case R.id.Look:
            F.num=10;
            startActivity(new Intent(this,MapsActivity.class));
            break;
        case R.id.Point:
            if(json_string==null){
                Toast.makeText(getApplicationContext(),"다시 클릭해 주세요",Toast.LENGTH_SHORT).show();
            }
            else
            {
                Intent intent=new Intent(this,FullShopsActivity.class);
                intent.putExtra("json_data",json_string);
                startActivity(intent);
            }
            break;
    }
}
    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {

            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        Reference F=(Reference)getApplication();

        if (id == R.id.nav_main) {
            // Handle the camera action
            startActivity(new Intent(this,MainActivity.class));

        } else if (id == R.id.nav_board) {

            if(F.login==2) {
                if (json_string == null) {
                    Toast.makeText(getApplicationContext(), "데이터를 읽어오는데 실패했습니다.", Toast.LENGTH_SHORT).show();
                } else {
                    Intent intent = new Intent(this, BoardActivity.class);
                    intent.putExtra("json_data", json_string);
                    startActivity(intent);

                }
            }
            else{
                Toast.makeText(getApplicationContext(),"로그인을 해주세요",Toast.LENGTH_SHORT).show();

            }
        } else if (id == R.id.nav_makecoupon) {

            if(F.login==2) {
                if(F.setNum()!=1) {
                    startActivity(new Intent(this, MakeCoupon.class));

                }
                else
                    Toast.makeText(getApplicationContext(),"이미 지급 되었습니다.",Toast.LENGTH_SHORT).show();


            }
            else {
                Toast.makeText(getApplicationContext(), "로그인을 해주세요", Toast.LENGTH_SHORT).show();


            }


        } else if (id == R.id.nav_couponsave) {

            if(F.setLogin()==2) {
                startActivity(new Intent(this, WhatCoupon.class));
            }
            else {
                Toast.makeText(getApplicationContext(), "로그인을 해주세요", Toast.LENGTH_SHORT).show();


            }

        } else if (id == R.id.nav_notice) {
            startActivity(new Intent(this,MainActivity.class));

        } else if (id == R.id.nav_set) {
            startActivity(new Intent(this, MainActivity.class));

        }else if (id == R.id.nav_logout) {
            startActivity(new Intent(this,MainActivity.class));


        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    public class JsonTask extends AsyncTask<String, String, String> {


        protected String doInBackground(String... parms) {
            HttpURLConnection connection = null;
            BufferedReader reader = null;


            try {
                URL url = new URL(parms[0]);
                connection = (HttpURLConnection) url.openConnection();
                connection.connect();

                InputStream stream = connection.getInputStream();

                reader = new BufferedReader(new InputStreamReader(stream));

                StringBuffer buffer = new StringBuffer();
                String line = "";
                while ((line = reader.readLine()) != null) {
                    buffer.append(line);

                }
                json_string=buffer.toString();
                return buffer.toString();
                /*
                String finalJson= buffer.toString();


                JSONObject parentObject=new JSONObject(finalJson);
                JSONArray parentArray= parentObject.getJSONArray("result");

                StringBuffer finalBufferedData=new StringBuffer();
                for(int i=0;i<parentArray.length()-1;i++) {


                    JSONObject finalObject = parentArray.getJSONObject(i);

                    String shopname = finalObject.getString("shop");
                    String point = finalObject.getString("point");
                    String text = finalObject.getString("text");

                    finalBufferedData.append("가게명 : "+shopname+"\t"+"평점 : "+point+"\n"+"말 : "+text+"\n");



                }

                return finalBufferedData.toString();
*/
            } catch (MalformedURLException e) {
                e.printStackTrace();
                Log.d("1번","malformed");
            } catch (IOException e) {
                e.printStackTrace();
                Log.d("2번","ioexcept");
            }
            /*
            catch(JSONException e){
                e.printStackTrace();
                Log.d("3번","JSONexcept");
            }*/
            finally {
                if ((connection != null)) {
                    connection.disconnect();
                }
                try {
                    if (reader != null) {
                        reader.close();
                    }
                } catch (IOException e) {
                    e.printStackTrace();
                    Log.d("4번","finally ioexcept");
                }
            }
            return null;
        }
        protected void onPostExecute(String result) {
            super.onPostExecute(result);
            //tvData.setText(result);
            //items.add(result);
            json_string=result;


        }
    }

    public boolean onKeyDown(int keyCode, KeyEvent event) {
        switch (keyCode) {
            case KeyEvent.KEYCODE_BACK:
                startActivity(new Intent(this,MainActivity.class));
                break;
        }
        return true;

    }
}

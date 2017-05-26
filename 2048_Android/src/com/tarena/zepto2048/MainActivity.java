package com.tarena.zepto2048;

import android.os.Bundle;
import android.app.Activity;
import android.util.Log;
import android.view.Menu;
import android.webkit.ConsoleMessage;
import android.webkit.WebChromeClient;
import android.webkit.WebView;

public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
//        ����webView���
        WebView wv = new WebView(getApplicationContext());
//        ��������ִ��js
        wv.getSettings().setJavaScriptEnabled(true);
//        ����wvҪ�������ҳ
       // wv.loadUrl("file:///android_asset/2048.html");
        wv.loadUrl("http://1.kflionic.applinzi.com/2048.html");
        
//        ��־��Ϣ
        wv.setWebChromeClient(new WebChromeClient(){
        	@Override
        	public boolean onConsoleMessage(ConsoleMessage consoleMessage) {
        		Log.e("test","msg is "+consoleMessage.message()
        				+" line is "+consoleMessage.lineNumber());
        		// TODO Auto-generated method stub
        		return super.onConsoleMessage(consoleMessage);
        	}
        });
        
//        ����Ҫȥ��ʾ������
        setContentView(wv);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}

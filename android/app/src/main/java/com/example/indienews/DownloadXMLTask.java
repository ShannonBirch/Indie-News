package com.example.indienews;

import android.content.Context;
import android.os.AsyncTask;
import android.util.Log;
import android.view.View;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;

import java.net.URL;
import java.util.function.BinaryOperator;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;

public class DownloadXMLTask extends AsyncTask<URL, Void, Boolean> {
    protected Document xmlFile;
    protected View view;
    protected Context context;



    protected Boolean doInBackground(URL... url){ //Download the XML file
        DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();

        try {
            DocumentBuilder db = dbf.newDocumentBuilder();
            Log.d("Made it", "To here");
            Log.d("URL", url[0].toString());
            xmlFile = db.parse(new InputSource(url[0].openStream())); //TODO: Figure out if there's a way to have url not be an array
            Log.d("But probably", "Not to here");
            return true; // The program worked
        } catch(Exception e){
            Log.e("Error is", "Here");
            Log.e("Error", "" + e.getMessage());
            e.printStackTrace();
        }

        return false; //Something went very wrong
    }




}

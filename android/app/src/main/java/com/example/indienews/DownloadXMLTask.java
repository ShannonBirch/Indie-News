package com.example.indienews;

import android.os.AsyncTask;
import android.util.Log;

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

    protected Boolean doInBackground(URL... url){ //Download the XML file
        DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();

        try {
            DocumentBuilder db = dbf.newDocumentBuilder();
            xmlFile = db.parse(new InputSource(url[0].openStream())); //TODO: Figure out if there's a way to have url not be an array

            return true; // The program worked
        } catch(Exception e){

            Log.e("Error", "" + e.getMessage());
            e.printStackTrace();
        }

        return false; //Something went very wrong
    }




}

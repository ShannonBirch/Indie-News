package com.example.indienews.ui;

import android.content.Context;
import android.util.Log;
import android.view.View;

import androidx.fragment.app.Fragment;

import com.example.indienews.Article;
import com.example.indienews.ArticleParseXMLTask;
import com.example.indienews.DownloadXMLTask;

import java.net.URL;
import java.util.ArrayList;

public class BaseFragment extends Fragment {
    protected ArticleParseXMLTask xmlTask;
    protected ArrayList<Article> articleArrayList;


    protected void parseXML(URL url, View v, Context c){
        Log.d("in", "Parsexml");
        xmlTask  = new ArticleParseXMLTask(v, c);
        xmlTask.execute(url);
        articleArrayList = xmlTask.getArticleArrayList();
        Log.d("At end", "ParseXml");

    }

}

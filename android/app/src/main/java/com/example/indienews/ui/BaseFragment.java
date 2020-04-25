package com.example.indienews.ui;

import android.util.Log;

import androidx.fragment.app.Fragment;

import com.example.indienews.Article;
import com.example.indienews.ArticleParseXMLTask;
import com.example.indienews.DownloadXMLTask;

import java.net.URL;
import java.util.ArrayList;

public class BaseFragment extends Fragment {
    protected ArticleParseXMLTask xmlTask = new ArticleParseXMLTask();
    protected ArrayList<Article> articleArrayList;

    protected void parseXML(URL url){
        Log.d("xmlTask response", xmlTask.execute(url).toString());
        articleArrayList = xmlTask.getArticleArrayList();
    }

}

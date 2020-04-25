package com.example.indienews;

import android.util.Log;

import org.w3c.dom.Element;
import org.w3c.dom.NodeList;

import java.util.ArrayList;

public class ArticleParseXMLTask extends DownloadXMLTask {
    protected ArrayList<Article> articleArrayList = new ArrayList<Article>();

    @Override
    protected void onPostExecute(Boolean bool){  //Parse the XML file and update view
        NodeList nodelist = xmlFile.getElementsByTagName("article");

        for(int i=0;i<nodelist.getLength();i++){
            Element articleElement = (Element) nodelist.item(i);


            articleArrayList.add(elementToArticle(articleElement));
        }
    }

    public ArrayList<Article> getArticleArrayList(){
        return articleArrayList;
    }

    private Article elementToArticle(Element aE){//This parses the Element into an Article object
        Article tempArticle = new Article(); //Create a new empty Article

        tempArticle.setId(Long.parseLong(aE.getElementsByTagName("article_id").item(0).getTextContent()));
        tempArticle.setBlurb(aE.getElementsByTagName("blurb").item(0).getTextContent());
        tempArticle.setHeadline(aE.getElementsByTagName("headline").item(0).getTextContent());
        tempArticle.setThumbnail(aE.getElementsByTagName("thumbnail").item(0).getTextContent());


        return tempArticle;
    }
}


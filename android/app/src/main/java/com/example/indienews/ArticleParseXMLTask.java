package com.example.indienews;

import android.content.Context;
import android.util.Log;
import android.view.View;

import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import org.w3c.dom.Element;
import org.w3c.dom.NodeList;

import java.util.ArrayList;

public class ArticleParseXMLTask extends DownloadXMLTask {
    private ArrayList<Article> articleArrayList = new ArrayList<Article>();

    public ArticleParseXMLTask(View v, Context c){
        view = v;
        context = c;
    }
    @Override
    protected void onPostExecute(Boolean bool){  //Parse the XML file and update view
        Log.d("tag", "post Execute");
        articleArrayList.clear();
        NodeList nodelist = xmlFile.getElementsByTagName("article");

        for(int i=0;i<nodelist.getLength();i++){
            Element articleElement = (Element) nodelist.item(i);

            articleArrayList.add(elementToArticle(articleElement));
        }

        updateView();
    }

    public ArrayList<Article> getArticleArrayList(){

        Log.d("getList list size: ", ""+articleArrayList.size());
        return articleArrayList;
    }

    private Article elementToArticle(Element aE){//This parses the Element into an Article object
        Article tempArticle = new Article(); //Create a new empty Article

        tempArticle.setId(Long.parseLong(aE.getElementsByTagName("article_id").item(0).getTextContent()));
        tempArticle.setAuthor("Darragh Kelly"); //Todo: Add Authors to database
        tempArticle.setBlurb(aE.getElementsByTagName("blurb").item(0).getTextContent());
        tempArticle.setHeadline(aE.getElementsByTagName("headline").item(0).getTextContent());

        String thumbnailLoc = "http://192.168.2.24/resources/pics/thumbs/" +
                                aE.getElementsByTagName("thumbnail").item(0).getTextContent(); //To
        tempArticle.setThumbnail(thumbnailLoc);


        return tempArticle;
    }

    private void updateView(){
        RecyclerView rv = (RecyclerView) view.findViewById(R.id.recycler_view);
        LinearLayoutManager llm = new LinearLayoutManager(context);
        ArticleAdapter adapter = new ArticleAdapter((articleArrayList));
        rv.setLayoutManager(llm);
        rv.setAdapter(adapter);
    }
}


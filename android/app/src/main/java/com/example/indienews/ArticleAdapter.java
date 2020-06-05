package com.example.indienews;

import android.app.Activity;


import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class ArticleAdapter extends RecyclerView.Adapter<ArticleAdapter.ArticleViewHolder> {
    protected ArrayList<Article> articles;


    public static class ArticleViewHolder extends RecyclerView.ViewHolder {
      CardView articleCardView;
      TextView headlineText, blurbText;
      ImageView thumbImg;
      RecyclerView rv;


      ArticleViewHolder(View itemView){
          super(itemView);
          articleCardView = (CardView)itemView.findViewById(R.id.card_view);
          headlineText = (TextView)itemView.findViewById(R.id.headline_text);
          blurbText = (TextView) itemView.findViewById(R.id.blurb_text);
          thumbImg = (ImageView) itemView.findViewById(R.id.article_thumbnail);
          rv = (RecyclerView) itemView.findViewById(R.id.recycler_view);
      }


    }

    public ArticleAdapter(ArrayList<Article> articles){
        this.articles = articles;
    }

    @Override
    public int getItemCount(){
        return articles.size();
    }

    @Override
    public ArticleViewHolder onCreateViewHolder(ViewGroup viewGroup, int i){
        View v = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.article_card, viewGroup, false);
       return (new ArticleViewHolder(v));
    }

    @Override
    public void onBindViewHolder(ArticleViewHolder aVH, int i){ //Where the view is edited
        aVH.headlineText.setText(articles.get(i).getHeadline());
        aVH.blurbText.setText(articles.get(i).getBlurb());

        Picasso.get().load(articles.get(i).getThumbnail()).resize(80, 80).into(aVH.thumbImg);
        Log.d("Picture ", articles.get(i).getBlurb());

        aVH.articleCardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Log.d("Test", articles.get(i).getHeadline());
                Intent in = new Intent(v.getContext(), ArticleActivity.class);
                in.putExtra("article", articles.get(i));
//                aVH.rv.setVisibility(View.INVISIBLE);



                v.getContext().startActivity(in);

            }
        });

    }

    @Override
    public void onAttachedToRecyclerView(RecyclerView recyclerView){
        super.onAttachedToRecyclerView(recyclerView);
    }
}

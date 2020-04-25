package com.example.indienews;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class ArticleAdapter extends RecyclerView.Adapter<ArticleAdapter.ArticleViewHolder> {
    protected ArrayList<Article> articles;

    public static class ArticleViewHolder extends RecyclerView.ViewHolder {
      CardView articleCardView;
      TextView headlineText;

      ArticleViewHolder(View itemView){
          super(itemView);
          articleCardView = (CardView)itemView.findViewById(R.id.card_view);
          headlineText = (TextView)itemView.findViewById(R.id.headline_text);
      }


    }

    ArticleAdapter(ArrayList<Article> articles){
        this.articles = articles;
    }

    @Override
    public int getItemCount(){
        return articles.size();
    }

    @Override
    public ArticleViewHolder onCreateViewHolder(ViewGroup viewGroup, int i){
        View v = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.article_card, viewGroup, false);
        ArticleViewHolder avh = new ArticleViewHolder(v);
        return avh;
    }

    @Override
    public void onBindViewHolder(ArticleViewHolder aVH, int i){
        aVH.headlineText.setText(articles.get(i).getHeadline());
    }

    @Override
    public void onAttachedToRecyclerView(RecyclerView recyclerView){
        super.onAttachedToRecyclerView(recyclerView);
    }
}

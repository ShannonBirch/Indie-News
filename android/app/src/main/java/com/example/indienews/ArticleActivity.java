package com.example.indienews;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.navigation.Navigation;
import androidx.recyclerview.widget.RecyclerView;

import com.example.indienews.Article;
import com.google.android.material.navigation.NavigationView;

public class ArticleActivity extends AppCompatActivity {
    Article article;

    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.article_copy);


        Intent intent = this.getIntent();
        article = (Article) intent.getSerializableExtra("article");

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.article_drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();
//
////        RecyclerView rv = (RecyclerView) findViewById(R.id.recycler_view);
////        rv.setAdapter(new ArticleAdapter());
//
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
//        navigationView.setNavigationItemSelectedListener(this);

        TextView headlineText = (TextView) findViewById(R.id.article_headline_text);
        headlineText.setText(article.getHeadline());

        Log.d("Test", "In Article activity");
    }

}

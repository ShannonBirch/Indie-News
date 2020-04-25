package com.example.indienews.ui.new

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.lifecycle.Observer
import androidx.lifecycle.ViewModelProviders
import com.example.indienews.Article
import com.example.indienews.ArticleAdapter
import com.example.indienews.R
import com.example.indienews.ui.BaseFragment
import java.net.URL


class NewFragment : BaseFragment() {

    private lateinit var newViewModel: NewViewModel


    override fun onCreateView(
            inflater: LayoutInflater,
            container: ViewGroup?,
            savedInstanceState: Bundle?
    ): View? {
        newViewModel =
                ViewModelProviders.of(this).get(NewViewModel::class.java)
        val root = inflater.inflate(R.layout.fragment_new, container, false)
        newViewModel.text.observe(viewLifecycleOwner, Observer {

        })
        var url = URL("http://192.168.2.24/php/scripts/getNew.php");
        parseXML(url);

        var ArticleAdapter adapter = new ArticleAdapter(articleArrayList);

        return root
    }
}

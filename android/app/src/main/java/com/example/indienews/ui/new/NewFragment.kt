package com.example.indienews.ui.new

import android.os.Bundle
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.lifecycle.Observer
import androidx.lifecycle.ViewModelProviders
import androidx.recyclerview.widget.RecyclerView
import com.example.indienews.Article
import com.example.indienews.ArticleAdapter
import com.example.indienews.R
import com.example.indienews.ui.BaseFragment
import kotlinx.android.synthetic.*
import kotlinx.android.synthetic.main.fragment_new.*
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

//        val recyView: recycler_view
        var url = URL("http://192.168.2.24/php/scripts/getNew.php");
        var test = parseXML(url, root, context);
        Log.d("test: " , test.toString());


        return root
    }
}

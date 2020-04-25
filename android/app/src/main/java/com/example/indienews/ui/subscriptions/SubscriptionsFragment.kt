package com.example.indienews.ui.subscriptions

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.lifecycle.Observer
import androidx.lifecycle.ViewModelProviders
import com.example.indienews.R
import com.example.indienews.ui.BaseFragment

class SubscriptionsFragment : BaseFragment() {

    private lateinit var subscriptionsViewModel: SubscriptionsViewModel

    override fun onCreateView(
            inflater: LayoutInflater,
            container: ViewGroup?,
            savedInstanceState: Bundle?
    ): View? {
        subscriptionsViewModel =
                ViewModelProviders.of(this).get(SubscriptionsViewModel::class.java)
        val root = inflater.inflate(R.layout.fragment_subscriptions, container, false)
        val textView: TextView = root.findViewById(R.id.text_gallery)
        subscriptionsViewModel.text.observe(viewLifecycleOwner, Observer {
            textView.text = it
        })
        return root
    }
}

// require('./bootstrap');
//==========ここから追加==========
import "./bootstrap";
import Vue from "vue";
import ArticleLike from "./components/ArticleLike"
//VueTagを使用する為のもの
import ArticleTagsInput from './components/ArticleTagsInput'
const app = new Vue({
    el: "#app",
    components: {
        ArticleLike,
        //ArticleTag
        ArticleTagsInput,
    }
});
//==========ここまで追加==========

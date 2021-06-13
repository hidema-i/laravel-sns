// require('./bootstrap');
//==========ここから追加==========
import "./bootstrap";
import Vue from "vue";
import ArticleLike from "./components/ArticleLike";

const app = new Vue({
    el: "#app",
    components: {
        ArticleLike
    }
});
//==========ここまで追加==========

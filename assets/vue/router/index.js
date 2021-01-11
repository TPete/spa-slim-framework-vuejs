import Vue from "vue"
import VueRouter from "vue-router"
import MovieList from "../views/MovieList";
import AddMovie from "../views/AddMovie";

Vue.use(VueRouter)

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/movies",
            component: MovieList
        },
        {
            path: "/add-movie",
            component: AddMovie
        },
        {
            path: "*",
            redirect: "/movies"
        },
    ]
})
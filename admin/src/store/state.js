const store = {
    user: {
        token: sessionStorage.getItem("TOKEN"),
        data: {},
    },
    products: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: 10,
        total: null,
    },
    categories: {
        data: null,
        loading: true,
        total: null
    },
    reviews:{
        data:null,
        loading:true,
        from: null,
        to: null,
        total: null,
        limit:10,
        link:[]
    },
    toast: {
        show: false,
        message: "",
        delay: 5000,
    },
    errorToast: {
        show: false,
        message: "",
        delay: 5000,
    },
    faqs: {
        data: null,
        loading: true,
    },
    cities: {
        data: null,
        loading: true,
    },
    blogs: {
        loading: false,
        data: [],
    },
    appLocale:'en',
    pageTexts: {
        data: null,
        loading: true,
    },
};

export default store;

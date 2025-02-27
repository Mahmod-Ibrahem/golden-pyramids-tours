export function setUser(state, user) {
  state.user.data = user;
  }

  export function setToken(state, token) {
    state.user.token = token;
    if (token) {
      sessionStorage.setItem('TOKEN', token);
    } else {
      sessionStorage.removeItem('TOKEN')
    }
  }

  export function setProducts(state, [loading, data = null]) {
    if (data) {
      state.products = {
        ...state.products,
        data: data.data,
        links: data.meta?.links,
        page: data.meta.current_page,
        limit: data.meta.per_page,
        from: data.meta.from,
        to: data.meta.to,
        total: data.meta.total,
      }
    }
    state.products.loading = loading;
  }


  export function showToast(state, message) {
    state.toast.show = true;
    state.toast.message = message;
  }

export function showErrorToast(state, message) {
    state.errorToast.show = true;
    state.errorToast.message = message;
}
export function hideErrorToast(state) {
    state.errorToast.show = false;
    state.errorToast.message = '';
}

  export function hideToast(state) {
    state.toast.show = false;
    state.toast.message = '';
  }

export function setCategories(state,data)
{
    state.categories.data=data.data
    state.categories.loading=false
}

export function setReviews(state,data)
{
    state.reviews.data=data.data
    state.reviews.loading=false
    state.reviews.from=data.meta.from
    state.reviews.to=data.meta.to
    state.reviews.total=data.meta.total
    state.reviews.links=data.meta.links
}

export function setFaqs(state,data)
{
    state.faqs.data=data.data
    state.faqs.loading=false
}
export function setCities(state,data)
{
    state.cities.data=data.data
    state.cities.loading=false
}
export function setBlogs(state,data)
{
    state.blogs.data=data.data
    state.blogs.loading=false
}
export function updateLocale(state, locale) {
    state.appLocale = locale;
  }

export function setPageTexts(state,data)
{
    state.pageTexts.data=data.data
    state.pageTexts.loading=false
}

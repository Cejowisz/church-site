
export default ({ store, route, app }) => {

    // Redirect to login if token is not provided.
    if (route.path.includes('/admin') && localStorage.getItem('token') === null || undefined) {
        app.router.push('/login')
    }

}
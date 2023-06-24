const { createApp } = Vue

createApp({
    data() {
        return {
            productFilter: 'All',
            showCart: false,
            cartNotif: false,
            cart: [],
            cartIndex: undefined,
            sessionCart: [],
            total: 0,
            purchase: false,
            loading: false,
            confirmation: false,
            API: "../cart.php"
        }
    },
    // Call Leaving Method to destroy session when user close browser window
    created() {
        window.addEventListener("beforeunload", this.leaving);
    },
    // Get Cart Data 
    mounted() {
        console.log("Hello from VueJS 👋"),
        this.getApiData()
    },
    computed: {
        // Update total price
        getTotal() {
            if (this.sessionCart.length > 0) {
                this.total = 0,
                this.sessionCart.forEach(element => {
                    this.total += Number(element.price)
                });
                return this.total;
            }
        }
    },
    methods: {
        // Return the User Session Cart Array
        getSessionCart(sessionId) {
            this.cart.forEach(element => {
                if (element.id === sessionId) {
                    this.cartIndex = this.cart.indexOf(element);
                    this.sessionCart = this.cart[this.cartIndex].cartItems;
                    console.log("Session Cart: ", this.sessionCart, this.sessionCart.constructor.name)
                }
            })
        },
        // Add Product Info to Array Cart
        addToCart(item) {
            this.showCart = true,
            this.postApiData({ newItem: item })
        },
        // Remove Product from Array Cart
        removeFromCart(position) {
            this.postApiData({ deleteItem: position })
        },
        // Return items number in User Session Cart
        getItemsNum() {
            if (this.sessionCart.length > 0) {
                this.cartNotif = true;
                return this.sessionCart.length
            } else {
                this.cartNotif = false
            }     
        },
        // Confirm purchase and set empy Cart
        oneClickCheckout() {
            this.postApiData({ emptyCart: '' }),
            this.showCart = false,
            this.loading = true,
            this.purchase = true,
            this.getApiData()
            setTimeout(() => {
                this.loading = false,
                this.confirmation = true
            }, 1 * 8000);
            setTimeout(() => {
                this.confirmation = false,
                this.purchase = false
            }, 1 * 20000);
        },
        // Return Cart from API
        getApiData() {
            axios.get(this.API).then((response) => {
                this.cart = response.data;
                console.log("Response for GET Cart Data (All carts): ", this.cart)
            }).catch((error) => {
                console.error("Get Cart Data Error: " + error);
            });
        },
        // Send Cart Data to API
        postApiData(data) {
            axios.post(this.API, data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                this.cart = response.data;
                console.log("Response for POST Cart Data (All carts): ", response.data)
            }).catch((error) => {
                console.error("Sending Cart Data Error: " + error);
            });
        },
        // API call to clean user session cart and destroy session
        leaving() {
            this.postApiData({ emptyCart: 'destroy'})
        }
    }
}).mount('#app')
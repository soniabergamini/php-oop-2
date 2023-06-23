const { createApp } = Vue

createApp({
    data() {
        return {
            productFilter: 'All',
            showCart: false,
            cartNotif: false,
            cart: [],
            total: 0,
            purchase: false,
            loading: false,
            confirmation: false,
            API: "../cart.php"
        }
    },
    methods: {
        // Add Product Info to Array Cart
        addToCart(item) {
            // this.cart.push(item),
            this.showCart = true,
            this.cartNotif = true,
            this.postApiData({ newItem: item })
        },
        // Remove Product from Array Cart
        removeFromCart(position) {
            // this.cart.splice(position, 1),
            this.postApiData({ deleteItem: position })
        },
        getItemsNum() {
            if (this.cart.length > 0) {
                return this.cart.length
            } else {
                this.cartNotif = false
            }     
        },
        // Confirm purchase and set empy Cart
        oneClickCheckout() {
            this.cart = [],
            this.showCart = false,
            this.loading = true,
            this.purchase = true,
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
            }).catch((error) => {
                console.log("Get Cart Data Error: " + error);
            });
        },
        // Send Cart Data to API
        postApiData(data) {
            axios.post(this.API, data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                this.cart = response.data;
                console.log("response for POST Cart Data: ", response.data)
            }).catch((error) => {
                console.log("Sending Cart Data Error: " + error);
            });
        }
    },
    mounted() {
        console.log("Hello from VueJS 👋"),
        this.getApiData()
    },
    computed: {
        // Update total price
        getTotal() {
            this.total = 0,
            this.cart.forEach(element => {
                this.total += Number(element.price)
            });
            return this.total;
        }
    }
}).mount('#app')
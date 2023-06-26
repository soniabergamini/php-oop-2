const { createApp } = Vue
const app = createApp({
    data() {
        return {
            productFilter: 'All',
            showCart: false,
            showLogin: false,
            formLogin: true,
            cartNotif: false,
            cartIndex: undefined,
            sessionCart: [],
            sessionId: null,
            total: 0,
            purchase: false,
            loading: false,
            confirmation: false,
            API: "../cart.php"
        }
    },
    // Call Leaving Method to destroy session when user close browser window
    // created() {
    //     window.addEventListener("beforeunload", this.leaving)
    // },
    watch: {
        // Stop page scrolling if Login Form is visible
        showLogin() {
            if (this.showLogin) {
                this.scrollToTop()
                document.documentElement.style.overflow = 'hidden'
                return;
            } else {
                document.documentElement.style.overflow = 'auto'
            }
        }
    },
    // Get Cart Data 
    mounted() {
        console.log("Hello from VueJS 👋"),
        setTimeout(() => {
            console.log("SESSION ID: ", this.sessionId)
            // localStorage.setItem('prova', this.sessionId);
        }, 1 * 1);
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
        // Add Product Info to Array Cart
        addToCart(item) {
            this.showCart = true,
            this.postApiData({ newItem: item }),
            this.scrollToTop()
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
            setTimeout(() => {
                this.loading = false,
                this.confirmation = true
            }, 1 * 8000);
            setTimeout(() => {
                this.confirmation = false,
                this.purchase = false
            }, 1 * 20000);
        },
        // Post Cart Data to API and return User Session Cart Items
        postApiData(data) {
            axios.post(this.API, data, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                this.sessionCart = response.data;
                console.log("Response for POST API Data (User Session Cart->Items): ", response.data)
            }).catch((error) => {
                console.error("Sending Cart Data Error: " + error);
            });
        },
        // Scroll page on top to view cart
        scrollToTop() {
            window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
        },
        // API call to clean user session cart and destroy session
        leaving() {
            this.postApiData({ emptyCart: 'destroy'})
        }
    }
}).mount('#app')
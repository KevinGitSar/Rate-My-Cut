<template>
    <div>
        <div v-if="errorCode === 1001">
            <div class="lg:px-12 lg:py-12 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                <div class="w-full xl:w-1/2 relative">
                    <div>
                        <h1 class="my-2 text-gray-800 font-bold text-5xl">
                            Error Code: {{errorCode}}
                        </h1>
                        <h1 class="my-2 text-gray-800 font-bold text-3xl">
                            User Does Not Exist!
                        </h1>
                        <p class="my-2 text-gray-800">Sorry about that! Please visit our hompage to get where you need to go.</p>
                        <form action="/">
                            <button class="sm:w-full lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-[#FEB3B1] text-gray-800 hover:bg-[#FE6D73] focus:outline-none focus:ring-2 focus:ring-[#FE6D73] focus:ring-opacity-50">Take me there!</button>
                        </form>
                    </div>
                </div>
                <div>
                    <img src="https://cdn.onlinewebfonts.com/svg/img_204260.png" class="w-64 h-auto"/>
                </div>
            </div>
        </div>
        <div v-if="errorCode === 401">
            <div class="lg:px-12 lg:py-12 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                <div class="w-full xl:w-1/2 relative">
                    <div>
                        <h1 class="my-2 text-gray-800 font-bold text-5xl">
                            Error Code: {{errorCode}}
                        </h1>
                        <h1 class="my-2 text-gray-800 font-bold text-3xl">
                            Not Logged In!
                        </h1>
                        <p class="my-2 text-gray-800">Sorry you must log in first to view that page!</p>
                        <div class="flex justify-between w-2/5">
                            <form action="/">
                                <button class="sm:w-full lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-[#FEB3B1] text-gray-800 hover:bg-[#FE6D73] focus:outline-none focus:ring-2 focus:ring-[#FE6D73] focus:ring-opacity-50">Back Home!</button>
                            </form>
                            <form action="/login" method="GET">
                                <button class="sm:w-full lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-[#FEB3B1] text-gray-800 hover:bg-[#FE6D73] focus:outline-none focus:ring-2 focus:ring-[#FE6D73] focus:ring-opacity-50">Log In!</button>
                            </form>
                            <form action="/signup" method="GET">
                                <button class="sm:w-full lg:w-auto my-2 border rounded md py-4 px-8 text-center bg-[#FEB3B1] text-gray-800 hover:bg-[#FE6D73] focus:outline-none focus:ring-2 focus:ring-[#FE6D73] focus:ring-opacity-50">Sign up!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://cdn.onlinewebfonts.com/svg/img_204260.png" class="w-64 h-auto"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['errorCode'],
    data(){
        return{
        }
    },
}
</script>

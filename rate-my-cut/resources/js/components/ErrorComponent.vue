<template>
    <div>
        <!-- 1001 -->
        <div v-if="errorCode === 1001">
            <div class="xl:py-10 xl:px-22 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                <div class="w-full xl:w-1/2 relative">
                    <div>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl">
                            Error Code: {{errorCode}}
                        </h1>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-lg sm:text-2xl md:text-3xl 2xl:text-6xl">
                            User Does Not Exist!
                        </h1>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-lg sm:text-2xl 2xl:text-6xl">
                            Sorry about that! Please visit our hompage to get where you need to go.
                        </h1>
                        <form action="/" class="mt-5">
                            <button class="bg-[#FFCB77] w-36 sm:w-48 lg:w-56 lg:py-2 h-9 lg:h-12 text-sm sm:text-lg md:text-xl lg:text-2xl hover:rounded-xl text-[#FEF9EF] text-shadow hover:bg-[#FE6D73] hover:underline">Take me there!</button>
                        </form>
                    </div>
                </div>
                <div>
                    <img v-bind:src="'/icons/user-does-not-exist.png'" class="w-64 lg:w-96 xl:w-[400px] h-auto"/>
                </div>
            </div>
        </div>
        <!-- 401 -->
        <div v-if="errorCode === 401">
            <div class="xl:py-10 xl:px-22 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                <div class="w-full xl:w-1/2 relative">
                    <div>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl">
                            Error Code: {{errorCode}}
                        </h1>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-lg sm:text-2xl md:text-3xl 2xl:text-6xl">
                            Not Logged In!
                        </h1>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-lg sm:text-2xl md:text-3xl 2xl:text-6xl">
                            Sorry you must log in first to view that page!
                        </h1>
                        <div class="flex justify-between w-2/5 mt-5">
                            <form action="/" class="mr-5">
                                <button class="bg-[#FFCB77] w-36 sm:w-40 xl:w-56 lg:py-2 h-9 lg:h-12 text-sm sm:text-lg md:text-xl lg:text-2xl hover:rounded-xl text-[#FEF9EF] text-shadow hover:bg-[#FE6D73] hover:underline">Back Home!</button>
                            </form>
                            <form action="/login" class="mr-5">
                                <button class="bg-[#FFCB77] w-36 sm:w-40 xl:w-56 lg:py-2 h-9 lg:h-12 text-sm sm:text-lg md:text-xl lg:text-2xl hover:rounded-xl text-[#FEF9EF] text-shadow hover:bg-[#FE6D73] hover:underline">Log In!</button>
                            </form>
                            <form action="/signup" class="mr-5">
                                <button class="bg-[#FFCB77] w-36 sm:w-40 xl:w-56 lg:py-2 h-9 lg:h-12 text-sm sm:text-lg md:text-xl lg:text-2xl hover:rounded-xl text-[#FEF9EF] text-shadow hover:bg-[#FE6D73] hover:underline">Sign up!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <img v-bind:src="'/icons/not-logged-in.png'" class="w-64 lg:w-96 xl:w-[350px] h-auto"/>
                </div>
            </div>
        </div>
        <!-- 404 -->
        <div v-if="errorCode === 404">
            <div class="xl:py-10 xl:px-22 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                <div class="w-full xl:w-1/2 relative">
                    <div>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl">
                            Error Code: {{errorCode}}
                        </h1>
                        <h1 class="my-2 text-gray-800 font-bold xs:text-lg sm:text-2xl md:text-3xl 2xl:text-6xl">
                            Uh oh! Looks like that page does not exist, at least on Earth!
                        </h1>
                        <div class="flex justify-between w-2/5 mt-5">
                            <form action="/">
                                <button class="bg-[#FFCB77] w-36 sm:w-48 lg:w-56 xl:w-60 lg:py-2 h-9 sm:h-12 lg:h-12 xl:h-16 text-sm xs:text-lg sm:text-xl md:text-2xl xl:4xl 2xl:5xl hover:rounded-xl text-[#FEF9EF] text-shadow hover:bg-[#FE6D73] hover:underline">Back to Earth!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <img v-bind:src="'/icons/ufo.png'" title="Ufo icons created by Freepik" alt="UFO Error" class="w-64 lg:w-96 xl:w-max h-auto"/>
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

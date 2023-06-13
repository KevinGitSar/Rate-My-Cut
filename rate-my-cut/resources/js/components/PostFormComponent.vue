<template>
    <div class="md:w-10/12 mx-auto mt-5">
        <form :action="'/create/post/'+user.username" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">

            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="image">Show off your hair!</label>
                <strong v-if="errors && errors.image" class="text-red-600">*{{ errors.image[0] }}*</strong>
                <strong v-if="fileErrorMessage" class="text-red-600 mt-1 mx-auto">{{ fileErrorMessage }}</strong>
                <input type="file" accept="image/*" name="image" @change="onFileChange" class="block w-full text-sm sm:file:text-lg sm:text-lg md:text-2xl md:file:text-2xl text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:text-sm file:font-semibold file:bg-[#FFCB77] file:border-2 border-[#227C9D] hover:file:bg-[#FEF9EF]"/>
            </div>
            

            <div id="preview" class="flex my-auto justify-center mt-5">
                <img v-if="url" :src="url" class="h-96 w-max" />
            </div>
            
            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="description">Tell us about your new hair style!</label>
                <strong v-if="errors && errors.description" class="text-red-600">*{{ errors.description[0] }}*</strong>
                <textarea name="description" id="description" rows="2" cols="50" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]"></textarea>
            </div>
            
            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="category">Who is this hair style generally for?</label>     
                <strong v-if="errors && errors.category" class="text-red-600">*{{ errors.category[0] }}*</strong>
                <select name="category" id="category" v-model="category" class="text-2xl text-center rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]">
                    <option disabled value="null"> -- Please Select an Option -- </option>
                    <option value="W" class="text-center">Women</option>
                    <option value="M" class="text-center">Men</option>
                    <option value="G" class="text-center">Girls</option>
                    <option value="B" class="text-center">Boys</option>
                </select>
            </div>

            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="hair_length">How long is the hair?</label>
                <strong v-if="errors && errors.hair_length" class="text-red-600">{{ errors.hair_length[0] }}</strong>
                <select class="text-2xl text-center rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" name="hair_length" id="hair_length" v-model="length">
                    <option disabled value="null"> -- Please Select an Option -- </option>
                    <option value="short">Short</option>
                    <option value="medium">Medium</option>
                    <option value="long">Long</option>
                    <option value="ear length">Ear Length</option>
                    <option value="chin length">Chin Length</option>
                    <option value="shoulder length">Shoulder Length</option>
                    <option value="armpit length">Armpit Length</option>
                    <option value="mid-back length">Mid-back Length</option>
                    <option value="tailbone length">Tailbone Length</option>
                </select>
            </div>

            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="hair_type">What is your hair type?</label>
                <strong v-if="errors && errors.hair_type" class="text-red-600">*{{ errors.hair_type[0] }}*</strong>
                <select class="text-2xl text-center rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" name="hair_type" id="hair_type" v-model="type">
                    <option disabled value="null"> -- Please Select an Option -- </option>
                    <option value="straight">Straight</option>
                    <option value="wavy">Wavy</option>
                    <option value="curly">Curly</option>
                    <option value="coily">Coily</option>
                </select>
            </div>
            
            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="hair_style">What is this hair style called?*</label>
                <strong v-if="errors && errors.hair_style" class="text-red-600">*{{ errors.hair_style[0] }}*</strong>
                <input class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" type="text" name="hair_style" id="hair_style" placeholder="Buzz, Fade, Bob Cut, Ponytail..." />
            </div>

            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="location_name">Share where you cut your hair!</label>
                <input class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" type="text" name="location_name" id="location_name" placeholder="Ex: Freshcuts" />
            </div>

            <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                <label class="text-sm" for="location_address">And location!</label>
                <input class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" type="text" name="location_address" id="location_address" placeholder="Ex: 77 Violet Dr, Hamilton, ON L8E 3J2" /> 
            </div>


            <div class="text-center mb-5">
                <button class="mt-10 bg-[#FFCB77] border-2 border-[#227C9D] w-40 h-12 text-3xl rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Show off!</button>
            </div>
        </form>

    </div>
</template>

<script>

    export default 
    {
        props:['user', 'errors'],
        data(){
            return {
                url: null,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                description: "",
                category: null,
                length: null,
                type: null,
                fileErrorMessage: null,

            }
        },
        methods: {
            onFileChange(e){
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
                // console.log(file.size);
                // if(file.size > 2000000){
                //     this.fileErrorMessage = 'This file size is too large. :' + file.size;
                //     this.url = null;
                // } else {
                //     this.url = URL.createObjectURL(file);
                //     this.fileErrorMessage = null;
                // }
            }
        },
    }
</script>

<style scoped>
</style>

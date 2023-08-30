<template>
    <div class="w-11/12 mx-auto">
        <h4 @click="filterDropdown = !filterDropdown" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 sm:w-48 mx-auto xs:text-lg sm:text-2xl md:text-3xl text-shadow">Filter</h4>
        <form v-if="filterDropdown" :action="'/'" method="GET" class="" >
            <div class="my-2">
                <h4 class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 sm:w-40 mx-auto text-sm  sm:text-lg md:text-xl text-shadow">Location</h4>
                <div>
                    <!-- add location filtering -->
                </div>
            </div>
            
            <div class="my-2">
                <h4 @click="category = !category" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 sm:w-40 mx-auto text-sm sm:text-lg md:text-xl text-shadow">Category</h4>
                <div v-if="category" class="w-9/12 mx-auto">
                    <input type="checkbox" id="category1" name="category1" value="W" v-model="category1">
                    <label for="category1">Women</label><br>

                    <input type="checkbox" id="category2" name="category2" value="M" v-model="category2">
                    <label for="category2">Men</label><br>

                    <input type="checkbox" id="category3" name="category3" value="G" v-model="category3">
                    <label for="category3">Girls</label><br>

                    <input type="checkbox" id="category4" name="category4" value="B" v-model="category4">
                    <label for="category4">Boys</label><br>
                </div>
            </div>    
            
            <div class="my-2">
                <h4 @click="length = !length" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 sm:w-40 mx-auto text-sm sm:text-lg md:text-xl text-shadow">Hair Length</h4>
                <div v-if="length" class="w-9/12 mx-auto">
                    <input type="checkbox" id="length1" name="length1" value="short" v-model="length1">
                    <label for="length1">Short</label><br>

                    <input type="checkbox" id="length2" name="length2" value="medium" v-model="length2">
                    <label for="length2">Medium</label><br>

                    <input type="checkbox" id="length3" name="length3" value="long" v-model="length3">
                    <label for="length3">Long</label><br>

                    <input type="checkbox" id="length4" name="length4" value="ear length" v-model="length4">
                    <label for="length4">Ear Length</label><br>

                    <input type="checkbox" id="length5" name="length5" value="chin length" v-model="length5">
                    <label for="length5">Chin Length</label><br>

                    <input type="checkbox" id="length6" name="length6" value="shoulder length" v-model="length6">
                    <label for="length6">Shoulder Length</label><br>

                    <input type="checkbox" id="length7" name="length7" value="armpit length" v-model="length7">
                    <label for="length7">Armpit Length</label><br>

                    <input type="checkbox" id="length8" name="length8" value="mid-back length" v-model="length8">
                    <label for="length8">Mid-back Length</label><br>

                    <input type="checkbox" id="length9" name="length9" value="tailbone length" v-model="length9">
                    <label for="length9">Tailbone Length</label><br>
                </div>
            </div>

            <div class="my-2">
                <h4 @click="type = !type" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 sm:w-40 mx-auto text-sm sm:text-lg md:text-xl text-shadow">Hair Type</h4>
                <div v-if="type" class="w-9/12 mx-auto">
                    <input type="checkbox" id="type1" name="type1" value="straight" v-model="type1">
                    <label for="type1">Straight</label><br>

                    <input type="checkbox" id="type2" name="type2" value="wavy" v-model="type2">
                    <label for="type2">Wavy</label><br>

                    <input type="checkbox" id="type3" name="type3" value="curly" v-model="type3">
                    <label for="type3">Curly</label><br>

                    <input type="checkbox" id="type4" name="type4" value="coil" v-model="type4">
                    <label for="type4">Coil</label><br>
                </div>
            </div>    
            
            <div class="mt-2">
                <h4 @click="style = !style" class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 sm:w-40 mx-auto text-sm sm:text-lg md:text-xl text-shadow">Hair Style</h4>
                <div v-if="style" class="w-9/12 mx-auto">
                    <label for="style">Style</label><br>
                    <input  class="w-full" type="text" id="style" name="style" placeholder="Ex: Buzz" v-model="styleValue" />
                </div>
            </div> 
            
            <div class="mt-2 flex justify-center">
                <button type="submit" class="bg-[#FFCB77] w-36 sm:w-48 h-9 text-sm sm:text-lg md:text-xl rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Apply Filters</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default 
    {
        props:['filters'],
        data(){
            return{
                filterDropdown: false,
                category: false,
                length: false,
                type: false,
                style: false,
                category1: JSON.stringify(this.filters['category1']),
                category2: JSON.stringify(this.filters['category2']),
                category3: JSON.stringify(this.filters['category3']),
                category4: JSON.stringify(this.filters['category4']),
                length1: JSON.stringify(this.filters['length1']),
                length2: JSON.stringify(this.filters['length2']),
                length3: JSON.stringify(this.filters['length3']),
                length4: JSON.stringify(this.filters['length4']),
                length5: JSON.stringify(this.filters['length5']),
                length6: JSON.stringify(this.filters['length6']),
                length7: JSON.stringify(this.filters['length7']),
                length8: JSON.stringify(this.filters['length8']),
                length9: JSON.stringify(this.filters['length9']),
                type1: JSON.stringify(this.filters['type1']),
                type2: JSON.stringify(this.filters['type2']),
                type3: JSON.stringify(this.filters['type3']),
                type4: JSON.stringify(this.filters['type4']),
                styleValue: JSON.parse(JSON.stringify(this.filters['style'])),

            }
        },
    }
</script>

<style scoped>
</style>

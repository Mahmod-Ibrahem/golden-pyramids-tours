<div class="text-gray-950 border p-6 shadow-md border-gray-950 w-fit md:w-96 rounded-lg">
    <h1
     class="text-3xl font-semibold pb-3 mb-6 text-gray-800 text-center border-b-2 border-gray-800">Booking Form</h1>

    <form method="POST" action="#">
       @csrf
        <div class="flex flex-col space-y-7 mt-2">

            <div class="relative bg-white">

                <input id='name' name="name" value="{{ old('name') }}" required
                class="peer input_style" placeholder="FullName" autocomplete="off">
                <label for="name" class="input_label_style">
                     FullName</label>
            </div>

            <div class="relative bg-white">

                <input id='email' name="email" value="{{ old('email') }}" required
                class="peer input_style" placeholder="email" autocomplete="off">

                <label for="email" class="input_label_style">
                     E-mail</label>

            </div>

            <div class="relative bg-white">

                <input id='phone' name="phone" value="{{ old('phone') }}" required
                class="peer input_style" placeholder="phone" autocomplete="off">

                <label for="email" class="input_label_style">
                     Phone</label>
            </div>

            <div class="relative bg-white">

                <input id='Country' name="Country" value="{{ old('Country') }}" required
                class="peer input_style" placeholder="Country" autocomplete="off">

                <label for="Country" class="input_label_style">
                     Country</label>
            </div>

            <div class="relative bg-white">

                <input id='Adult' name="Adult" value="{{ old('Adult') }}" required
                class="peer input_style" placeholder="Adult" autocomplete="off">

                <label for="Adult" class="input_label_style">
                     Adult</label>
            </div>

            <div class="relative bg-white">

                <input id='Childeren' name="Childeren" value="{{ old('Childeren') }}" required
                class="peer input_style" placeholder="Childeren" autocomplete="off">

                <label for="Childeren" class="input_label_style">
                     Childeren</label>
            </div>

            <div class="relative bg-white">

                <input id='Date' type="date" name="Date" value="{{ old('Date') }}" required
                class="peer input_style" placeholder="Date" autocomplete="off">

                <label for="Date" class="input_label_style">
                     Date</label>
            </div>
      <button type="submit"
            class="mb-3 w-full border-2 md:text-2xl border-gray-500 bg-gray-800 text-white
             hover:text-white font-semibold tracking-wide rounded-lg text-center cursor-pointer
                transition-all hover:border-gray-200 p-1">
            Confirm
        </button>
       </div>
    </form>
</div>

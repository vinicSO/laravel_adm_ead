<form action="{{ route($routerName) }}" method="GET">
    <div class="flex justify-end">
        <div class="mb-3 xl:w-96">
            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                <input class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:text-neutral-200 dark:placeholder:text-neutral-200"        type="text" name="filter" id="filter" placeholder="Pesquisar">
                <button class="relative z-[2] rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0">Pesquisar</button>
            </div>
        </div>
    </div>      
</form>
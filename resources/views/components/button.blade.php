<input {{ $attributes->merge(['type' => 'submit', 'class' => '
px-4 py-2.5
cursor-pointer
transition ease-in-out duration-150
inline-flex items-center font-bold
text-xs text-gray-100 dark:text-neutral-900

bg-purple-700 focus:bg-purple-800
dark:bg-purple-400 dark:focus:bg-purple-500
rounded uppercase tracking-widest
border-2 border-purple-700
dark:border-2 dark:border-purple-400
hover:border-2 hover:border-purple-800
dark:hover:border-2 hover:dark:border-purple-500

hover:bg-purple-800 dark:hover:bg-purple-500
focus:outline-2 focus:outline-purple-800 focus:border-purple-800
dark:focus-outline-2 dark:focus:outline-purple-500 dark:border-purple-500

focus:border-2 focus:border-purple-800 focus:border-purple-800
dark:focus-border-2 dark:focus:border-purple-500 dark:border-purple-500

focus:ring focus:ring-purple-800 focus:ring-opacity-25 focus-visible:outline-0
dark:focus:ring dark:focus:ring-purple-500 dark:focus:ring-opacity-25 dark:focus-visible:outline-0

hover:ring hover:ring-purple-800 hover:ring-opacity-25 hover:outline-0
dark:hover:ring dark:hover:ring-purple-500 dark:hover:ring-opacity-25 dark:hover:outline-0
disabled:opacity-25', 'value' => $slot]) }} />

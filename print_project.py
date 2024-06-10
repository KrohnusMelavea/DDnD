import os

file_extensions = ".php", ".html", ".js", ".css", ".bat", ".sql", ".py"
blacklisted_files = ".gitignore",
blacklisted_folders = ".git",

output = ""

for path, _, file_names in os.walk(os.getcwd()):
    folder_hierarchy = path.split("\\")
    if sum(blacklisted_folder in folder_hierarchy for blacklisted_folder in blacklisted_folders):
        continue
    for file_name in file_names:
        if not sum(file_name.endswith(file_extension) for file_extension in file_extensions):
            continue
        if file_name in blacklisted_files:
            continue
        file_path = f"{path}\\{file_name}"
        with open(file_path, "r") as file_handler:
            newline = "\n"
            output += f"{'-'*50}{newline}{file_path}\n{'-'*50}{newline}{file_handler.read()}{newline*5}"

print(output)


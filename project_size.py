import os

file_extensions = ".php", ".html", ".js", ".css", ".bat", ".sql", ".py"
blacklisted_files = ".gitignore",
blacklisted_folders = ".git",

stdout = ""

total_line_count = 0
total_char_count = 0
total_file_count = 0

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
            file_contents = file_handler.read()
            line_count = file_contents.count('\n')
            char_count = len(file_contents)
            total_line_count += line_count
            total_char_count += char_count
            total_file_count += 1
            stdout += f"{file_path}: {line_count} lines, {char_count} chars" + '\n'

print(f"{stdout}Total: {total_line_count} lines, {total_char_count} chars, {total_file_count} files")
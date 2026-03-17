# import os
# import json
# from pathlib import Path
# from dotenv import load_dotenv
# from auggie_sdk import Auggie

# # =============================
# # LOAD ENVIRONMENT VARIABLES
# # =============================

# load_dotenv()

# # Optional safety check (recommended)
# if not os.getenv("AUGMENT_API_TOKEN") or not os.getenv("AUGMENT_API_URL"):
#     raise RuntimeError(
#         "AUGMENT_API_TOKEN or AUGMENT_API_URL missing in environment"
#     )

# # =============================
# # CONFIGURATION (LIST ONLY)
# # =============================

# LIST_INPUT_DIR = "list-files"
# LIST_OUTPUT_DIR = "list-json"

# PROMPT_DIR = "prompts"
# LIST_PROMPT_FILE = "list_prompt.txt"

# MODEL_NAME = "sonnet4.5"
# # MODEL_NAME = "gpt-5"


# # =============================
# # HELPERS
# # =============================

# def load_prompt(filename):
#     with open(os.path.join(PROMPT_DIR, filename), "r", encoding="utf-8") as f:
#         return f.read()

# def parse_json(text):
#     try:
#         return json.loads(text)
#     except json.JSONDecodeError:
#         return None

# def convert_folder(input_dir, output_dir, prompt_text, agent):
#     os.makedirs(output_dir, exist_ok=True)

#     for cs_file in Path(input_dir).glob("*.cs"):
#         print(f"\n➡ Processing: {cs_file.name}")

#         code = cs_file.read_text(encoding="utf-8")

#         full_prompt = f"""
# {prompt_text}

# SOURCE CODE:
# {code}
# """

#         try:
#             response = agent.run(full_prompt, return_type=str)

#             data = parse_json(response)
#             if data is None:
#                 print("❌ Invalid JSON returned")
#                 print(response)
#                 continue

#             output_path = os.path.join(
#                 output_dir,
#                 f"{cs_file.stem}.json"
#             )

#             with open(output_path, "w", encoding="utf-8") as f:
#                 json.dump(data, f, indent=2)

#             print(f"✅ Saved → {output_path}")

#         except Exception as e:
#             print(f"❌ Error processing {cs_file.name}: {e}")

# # =============================
# # MAIN
# # =============================

# def main():
#     list_prompt = load_prompt(LIST_PROMPT_FILE)

#     # Auggie initialization
#     agent = Auggie(model=MODEL_NAME)

#     print("\n=== Converting LIST files ===")
#     convert_folder(
#         LIST_INPUT_DIR,
#         LIST_OUTPUT_DIR,
#         list_prompt,
#         agent
#     )

#     print("\n🎉 List conversion completed successfully!")

# if __name__ == "__main__":
#     main()

# ----------------------------------------

# #check cmd run as a administarator 
# C:\Windows\System32>where auggie
# C:\nvm4w\nodejs\auggie


# C:\Windows\System32>auggie --version
# 0.20.0-prerelease.5 (commit 57c25026)

import os
import json
from pathlib import Path
from dotenv import load_dotenv
from auggie_sdk import Auggie

# =============================
# LOAD ENV VARIABLES
# =============================

load_dotenv()

# =============================
# CONFIGURATION
# =============================

LIST_INPUT_DIR = "list-files"
LIST_OUTPUT_DIR = "list-json"

PROMPT_DIR = "prompts"
LIST_PROMPT_FILE = "list_prompt.txt"

MODEL_NAME = "sonnet4.5"

# 🔥 IMPORTANT: Use correct CLI path (your case)
CLI_PATH = r"path"

# =============================
# HELPERS
# =============================

def load_prompt(filename):
    with open(os.path.join(PROMPT_DIR, filename), "r", encoding="utf-8") as f:
        return f.read()

def parse_json_safe(text):
    try:
        return json.loads(text)
    except Exception:
        print("❌ JSON parsing failed. Raw response:")
        print(text)
        return None

def convert_folder(input_dir, output_dir, prompt_text, agent):
    os.makedirs(output_dir, exist_ok=True)

    for cs_file in Path(input_dir).glob("*.cs"):
        print(f"\n➡ Processing: {cs_file.name}")

        try:
            code = cs_file.read_text(encoding="utf-8")

            full_prompt = f"""
{prompt_text}

SOURCE CODE:
{code}
"""

            # ✅ FIX: no return_type → avoids parse error
            response = agent.run(full_prompt)

            # If response is tuple (auto inference)
            if isinstance(response, tuple):
                response = response[0]

            data = parse_json_safe(response)

            if data is None:
                continue

            output_path = os.path.join(
                output_dir,
                f"{cs_file.stem}.json"
            )

            with open(output_path, "w", encoding="utf-8") as f:
                json.dump(data, f, indent=2)

            print(f"✅ Saved → {output_path}")

        except Exception as e:
            print(f"❌ Error processing {cs_file.name}: {e}")

# =============================
# MAIN
# =============================

def main():
    list_prompt = load_prompt(LIST_PROMPT_FILE)

    print("\n=== Converting LIST files ===")

    # ✅ FINAL FIX: Proper CLI args for stable output
    with Auggie(
        model=MODEL_NAME,
        api_key=os.getenv("AUGMENT_API_TOKEN"),
        api_url=os.getenv("AUGMENT_API_URL"),
        cli_path=CLI_PATH,
        cli_args=[
            "--print",                 # 🔥 required for clean output
            "--output-format", "json", # 🔥 ensures valid JSON
            "--quiet",                 # less noise
            "--max-turns", "5"         # faster + stable
        ]
    ) as agent:

        convert_folder(
            LIST_INPUT_DIR,
            LIST_OUTPUT_DIR,
            list_prompt,
            agent
        )

    print("\n🎉 List conversion completed successfully!")

# =============================
# ENTRY
# =============================

if __name__ == "__main__":
    main()
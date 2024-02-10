export function getInitials(name: string): string {
    const nameArray = name.split(" ")
    const firstLetter = nameArray[0][0].toUpperCase()

    if (nameArray.length === 1) {
        return firstLetter
    }

    let lastLetter = nameArray.at(-1)?.at(0)?.toUpperCase()

    nameArray.toReversed().forEach((word) => {
        if (word.length > 2 && word[0] != firstLetter) {
            lastLetter = word[0].toUpperCase()
        }
    })

    return firstLetter + lastLetter
}

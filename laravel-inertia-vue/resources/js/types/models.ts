export type Model = {
    id?: string
    created_at: string
    updated_at: string
}

export type User = Model & {
    name: string
    username: string
    email: string
}

export type Chirp = Model & {
    user_id: string
    user: User
    content: string
    likes: number
}
